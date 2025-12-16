import { Routes } from '@angular/router';
import { Home } from './Pages/home/home';
import { Help } from './Pages/help/help';
import { Search } from './Pages/search/search';
import { Caretaker } from './Pages/caretaker/caretaker';
import { Login } from './Pages/login/login';
import { Signin } from './Pages/signin/signin';
import { Account } from './Pages/account/account';
import { Pet } from './Pages/pet/pet';

export const routes: Routes = [
    { path: '', redirectTo: 'home', pathMatch:'full'},
    { path: 'home', component: Home},
    { path: 'help', component: Help},
    { path: 'search', component: Search},
    { path: 'caretaker', component: Caretaker},
    { path: 'login', component: Login},
    { path: 'signin', component: Signin },
    { path: 'account', component: Account },
    { path: 'pet', component: Pet}
];
