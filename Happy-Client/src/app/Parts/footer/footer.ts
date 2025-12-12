import { Component } from '@angular/core';
import { RouterLink } from '@angular/router';

@Component({
  selector: 'app-footer',
  imports: [RouterLink],
  templateUrl: './footer.html',
  styles: `
  footer{
    color: #49261d;
    
  }
  .foot{
    padding: 2rem;
    background-color: #cae7e7;
  }
  .btn{
   background-color: #FB4D00;
   color: #FFEDE3;
  }
  .license a{
    color: #49261d;
    text-decoration:none;
  }
  .license a:hover{
    text-decoration:underline;
  }
  .nav-link{
    color: #49261D !important;
  }
  .cont-license{
    border-top: 1px solid;
    border-color: #49261D;
  }
  .fontawesome{
    color: #49261D;
    text-decoration: none;
  }
  .fontawesome:hover{
    text-decoration: underline;
  }
  `,
})
export class Footer {

}
