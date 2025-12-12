import { Component } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';

@Component({
  selector: 'app-header',
  imports: [RouterLink, RouterLinkActive],
  templateUrl: './header.html',
  styles: [`
    .navbar {
      background-color: #CAE7E7 !important;
    }
    
    .nav-link {
      color: #49261D;
    }
  `] 
})
export class Header {

}
