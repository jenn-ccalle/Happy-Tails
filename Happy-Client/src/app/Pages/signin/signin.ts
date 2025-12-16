import { CommonModule, NgClass } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { FormsModule, NgForm } from '@angular/forms';
import { Router, RouterLink } from '@angular/router';
import { Cliente } from '../../Shared/Services/cliente';
import { AuthService } from '../../Shared/Services/auth';

@Component({
  selector: 'app-signin',
  imports: [RouterLink, FormsModule, CommonModule],
  standalone: true,
  templateUrl: './signin.html',
  styleUrl: './signin.css',
})
export class Signin implements OnInit {
  errorMessage: string = '';
  successMessage: string = '';
  isLoading: boolean = false;

  constructor(
    private clienteService: Cliente,
    private authService: AuthService, 
    private router: Router
  ) {}

  ngOnInit(): void {}

  async createClient(form: NgForm) {
    if (!form.valid) {
      console.log('Formulario inválido');
      this.errorMessage = 'Por favor, completa todos los campos correctamente';
      return;
    }

    this.errorMessage = '';
    this.successMessage = '';

    console.log('Método createClient ejecutado');
    console.log('Form valid:', form.valid);
    console.log('Datos del formulario:', form.value);

    try {
      const result = await this.clienteService.createCliente(form.value);
      console.log('Resultado:', result);
      
      // GUARDAR USUARIO EN AuthService
      if (result.success && result.data) {
        const usuario = {
          id: result.data.id,
          nombre: result.data.nombre,
          apellidos: result.data.apellidos,
          email: result.data.email,
          dni: form.value.dni,
          telefono: form.value.telefono,
          direccion: form.value.direccion,
          fechaNac: form.value.fechaNac
        };
        
        this.authService.guardarUsuario(usuario);
      }
      
      this.successMessage = 'Cliente registrado correctamente. Redirigiendo...';
      
      // Redirigir a la cuenta
      setTimeout(() => {
        this.router.navigate(['/account']);
      }, 500);
      
    } catch (error: any) {
      console.error('Error al crear cliente:', error);
      
      if (error.error) {
        try {
          const errorObj = JSON.parse(error.error);
          this.errorMessage = errorObj.error || 'Error al registrar el cliente';
        } catch (e) {
          this.errorMessage = error.error || 'Error al registrar el cliente';
        }
      } else if (error.message) {
        this.errorMessage = error.message;
      } else {
        this.errorMessage = 'Error al registrar el cliente. Por favor, intenta de nuevo.';
      }
    }
  }
}
