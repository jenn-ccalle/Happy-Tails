// src/app/services/auth.service.ts
import { Injectable } from '@angular/core';
import { BehaviorSubject, Observable } from 'rxjs';

export interface UsuarioActual {
  id: number;
  nombre: string;
  apellidos: string;
  email: string;
  dni: string;
  telefono: string;
  direccion: string;
  fechaNac?: string;
}

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  // BehaviorSubject para mantener el estado del usuario
  private usuarioActualSubject = new BehaviorSubject<UsuarioActual | null>(null);
  public usuarioActual$: Observable<UsuarioActual | null> = this.usuarioActualSubject.asObservable();

  constructor() {
    // Cargar usuario desde localStorage al iniciar
    this.cargarUsuarioDesdeStorage();
  }

  // Guardar usuario después del registro
  guardarUsuario(usuario: UsuarioActual): void {
    localStorage.setItem('usuario_actual', JSON.stringify(usuario));
    this.usuarioActualSubject.next(usuario);
  }

  // Obtener usuario actual
  getUsuarioActual(): UsuarioActual | null {
    return this.usuarioActualSubject.value;
  }

  // Cargar usuario desde localStorage
  private cargarUsuarioDesdeStorage(): void {
    const usuarioGuardado = localStorage.getItem('usuario_actual');
    if (usuarioGuardado) {
      try {
        const usuario = JSON.parse(usuarioGuardado);
        this.usuarioActualSubject.next(usuario);
      } catch (e) {
        console.error('Error al cargar usuario:', e);
      }
    }
  }

  // Cerrar sesión
  cerrarSesion(): void {
    localStorage.removeItem('usuario_actual');
    this.usuarioActualSubject.next(null);
  }

  // Verificar si hay usuario logueado
  estaLogueado(): boolean {
    return this.usuarioActualSubject.value !== null;
  }
}