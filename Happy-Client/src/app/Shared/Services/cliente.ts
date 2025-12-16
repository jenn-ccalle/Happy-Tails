import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from '../../../enviroments/enviroment';

@Injectable({
  providedIn: 'root',
})
export class Cliente {
  constructor(private http: HttpClient) {}

  async createCliente(body: any) {
    console.log('Enviando datos al backend:', body);
    console.log('URL:', environment.Url + 'api/clientes/nuevo');

    const headers = new HttpHeaders({
      'Content-Type': 'application/json'
    });

    try {
      // Usar responseType 'text' y luego intentar parsear
      const response = await this.http.post(
        environment.Url + 'api/clientes/nuevo',
        body,
        { headers, responseType: 'text' }
      ).toPromise();

      console.log('Respuesta del servidor:', response);
      
      // Intentar parsear la respuesta como JSON
      try {
        return JSON.parse(response as string);
      } catch (e) {
        // Si no es JSON, devolver el texto
        return response;
      }
    } catch (error: any) {
      console.error('Error en la petición:', error);
      
      // Re-lanzar el error para que lo maneje el componente
      throw error;
    }
  }

  async login(email: string, contrasena: string) {
    console.log('Iniciando sesión:', email);
    console.log('URL:', environment.Url + 'api/clientes/login');

    const headers = new HttpHeaders({
      'Content-Type': 'application/json'
    });

    const body = {
      email,
      contrasena
    };

    try {
      const response = await this.http.post(
        environment.Url + 'api/clientes/login',
        body,
        { headers, responseType: 'text' }
      ).toPromise();

      console.log('Respuesta del servidor (login):', response);
      
      try {
        return JSON.parse(response as string);
      } catch (e) {
        return response;
      }
    } catch (error: any) {
      console.error('Error en login:', error);
      throw error;
    }
  }
}