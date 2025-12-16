import { Component } from '@angular/core';
import { RouterLink, Router } from '@angular/router';
import { Cliente } from '../../Shared/Services/cliente';
import { CommonModule } from '@angular/common';
import { NgForm, FormsModule } from '@angular/forms';
import { AuthService } from '../../Shared/Services/auth';

@Component({
  selector: 'app-login',
  imports: [RouterLink, FormsModule, CommonModule],
  templateUrl: './login.html',
  styleUrl: './login.css',
})
export class Login {
  errorMessage: string = '';
  isLoading: boolean = false;

  constructor(
    private authService: AuthService,
    private clienteService: Cliente,
    private router: Router
  ) {}

  async iniciarSesion(form: NgForm) {
    if (!form.valid) {
      this.errorMessage = 'Por favor, completa todos los campos';
      return;
    }

    this.isLoading = true;
    this.errorMessage = '';

    try {
      const { email, contrasena } = form.value;
      
      // Llamar al backend para verificar las credenciales
      const result = await this.clienteService.login(email, contrasena);
      
      console.log('Resultado del login:', result);

      if (result.success && result.data) {
        // Guardar usuario en AuthService
        const usuario = {
          id: result.data.id,
          nombre: result.data.nombre,
          apellidos: result.data.apellidos,
          email: result.data.email,
          dni: result.data.dni,
          telefono: result.data.telefono,
          direccion: result.data.direccion,
          fechaNac: result.data.fechaNac
        };
        
        this.authService.guardarUsuario(usuario);
        
        // Redirigir a la cuenta
        this.router.navigate(['/account']);
      } else {
        this.errorMessage = 'Credenciales incorrectas';
      }
      
    } catch (error: any) {
      console.error('Error al iniciar sesión:', error);
      
      if (error.error) {
        try {
          const errorObj = JSON.parse(error.error);
          this.errorMessage = errorObj.error || 'Error al iniciar sesión';
        } catch (e) {
          this.errorMessage = error.error || 'Error al iniciar sesión';
        }
      } else {
        this.errorMessage = 'Credenciales incorrectas. Por favor, verifica tu correo y contraseña.';
      }
    } finally {
      this.isLoading = false;
    }
  }
}
