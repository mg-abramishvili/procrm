import AllProjects from './components/AllProjects.vue';
import AddProject from './components/AddProject.vue';
import EditProject from './components/EditProject.vue';
import ViewProject from './components/ViewProject.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllProjects
    },
    {
        name: 'add',
        path: '/add',
        component: AddProject
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditProject
    },
    {
        name: 'view',
        path: '/view/:id',
        component: ViewProject
    }
];