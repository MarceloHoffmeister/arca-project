import Register from './Register';
import Incident from './Incident';
import Login from './Login';
import Profile from './Profile';

export default  [
    {
        path:'/',
        component: Login
    },
    {
        path:'/register',
        component: Register
    },
    {
        path:'/incident',
        component: Incident
    },
    {
        path:'/profile',
        component: Profile
    },
]
