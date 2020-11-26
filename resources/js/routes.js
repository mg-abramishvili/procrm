import AllProjects from './components/Projects/AllProjects.vue';
import AddProject from './components/Projects/AddProject.vue';
import EditProject from './components/Projects/EditProject.vue';
import ViewProject from './components/Projects/ViewProject.vue';

import AllFinances from './components/Finances/AllFinances.vue';
import AddFinance from './components/Finances/AddFinance.vue';
import EditFinance from './components/Finances/EditFinance.vue';
import ViewFinance from './components/Finances/ViewFinance.vue';

export const routes = [
    {
        name: 'projects',
        path: '/projects',
        component: AllProjects
    },
    {
        name: 'project-add',
        path: '/projects/add',
        component: AddProject
    },
    {
        name: 'project-edit',
        path: '/projects/edit/:id',
        component: EditProject
    },
    {
        name: 'project-view',
        path: '/projects/view/:id',
        component: ViewProject
    },
    {
        name: 'finances',
        path: '/finances',
        component: AllFinances
    },
    {
        name: 'finance-add',
        path: '/finances/add',
        component: AddFinance
    },
    {
        name: 'finance-edit',
        path: '/finances/edit/:id',
        component: EditFinance
    },
    {
        name: 'finance-view',
        path: '/finances/view/:id',
        component: ViewFinance
    }
];