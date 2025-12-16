import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService, UsuarioActual } from '../../Shared/Services/auth';

@Component({
  selector: 'app-account',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './account.html',
  styleUrl: './account.css',
})
export class Account implements OnInit {
  usuario: UsuarioActual | null = null;

  constructor(
    private authService: AuthService,
    private router: Router
  ) {}

  ngOnInit(): void {
    // Suscribirse a los cambios del usuario
    this.authService.usuarioActual$.subscribe(usuario => {
      this.usuario = usuario;
      
      // Si no hay usuario, redirigir al login
      if (!usuario) {
        this.router.navigate(['/login']);
      }
    });
  }

  cerrarSesion(): void {
    this.authService.cerrarSesion();
    this.router.navigate(['/login']);
  }

  registroMascota(): void{
    this.router.navigate(['/pet']);
  }
}