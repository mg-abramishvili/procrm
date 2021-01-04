import Login from './components/Login.vue';

import AllProjects from './components/Projects/AllProjects.vue';
import AddProject from './components/Projects/AddProject.vue';
import EditProject from './components/Projects/EditProject.vue';
import ViewProject from './components/Projects/ViewProject.vue';

import AllFinances from './components/Finances/AllFinances.vue';
import AddFinance from './components/Finances/AddFinance.vue';
import EditFinance from './components/Finances/EditFinance.vue';
import ViewFinance from './components/Finances/ViewFinance.vue';

import AllTasks from './components/Tasks/AllTasks.vue';
import AddTask from './components/Tasks/AddTask.vue';
import EditTask from './components/Tasks/EditTask.vue';

import AllLeads from './components/Leads/AllLeads.vue';
import AddLead from './components/Leads/AddLead.vue';
import EditLead from './components/Leads/EditLead.vue';

import AllDocuments from './components/Documents/AllDocuments.vue';
import AddDocument from './components/Documents/AddDocument.vue';
import EditDocument from './components/Documents/EditDocument.vue';
import ViewDocument from './components/Documents/ViewDocument.vue';

export const routes = [
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'projects',
        path: '/projects',
        component: AllProjects,
    },
    {
        name: 'project-add',
        path: '/projects/add',
        component: AddProject,
    },
    {
        name: 'project-edit',
        path: '/projects/edit/:id',
        component: EditProject,
    },
    {
        name: 'project-view',
        path: '/projects/view/:id',
        component: ViewProject,
    },
    {
        name: 'finances',
        path: '/finances',
        component: AllFinances,
    },
    {
        name: 'finance-add',
        path: '/finances/add',
        component: AddFinance,
    },
    {
        name: 'finance-edit',
        path: '/finances/edit/:id',
        component: EditFinance,
    },
    {
        name: 'finance-view',
        path: '/finances/view/:id',
        component: ViewFinance,
    },
    {
        name: 'tasks',
        path: '/tasks',
        component: AllTasks,
    },
    {
        name: 'task-add',
        path: '/tasks/add',
        component: AddTask,
    },
    {
        name: 'task-edit',
        path: '/tasks/edit/:id',
        component: EditTask,
    },
    {
        name: 'leads',
        path: '/leads',
        component: AllLeads,
    },
    {
        name: 'lead-add',
        path: '/leads/add',
        component: AddLead,
    },
    {
        name: 'lead-edit',
        path: '/leads/edit/:id',
        component: EditLead,
    },
    {
        name: 'documents',
        path: '/documents',
        component: AllDocuments,
    },
    {
        name: 'document-add',
        path: '/documents/add',
        component: AddDocument,
    },
    {
        name: 'document-edit',
        path: '/documents/edit/:id',
        component: EditDocument,
    },
    {
        name: 'document-view',
        path: '/documents/view/:id',
        component: ViewDocument,
    }
];