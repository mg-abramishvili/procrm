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
        beforeEnter: (to, from, next) =>{
            axios.get('/api/auth').then(()=>{
                next()
            }).catch(()=>{
                return next({ name: 'login'})
            })
        }
    },
    {
        name: 'project-add',
        path: '/projects/add',
        component: AddProject,
        beforeEnter: (to, from, next) =>{
            axios.get('/api/auth').then(()=>{
                next()
            }).catch(()=>{
                return next({ name: 'login'})
            })
        }
    },
    {
        name: 'project-edit',
        path: '/projects/edit/:id',
        component: EditProject,
        beforeEnter: (to, from, next) =>{
            axios.get('/api/auth').then(()=>{
                next()
            }).catch(()=>{
                return next({ name: 'login'})
            })
        }
    },
    {
        name: 'project-view',
        path: '/projects/view/:id',
        component: ViewProject,
        beforeEnter: (to, from, next) =>{
            axios.get('/api/auth').then(()=>{
                next()
            }).catch(()=>{
                return next({ name: 'login'})
            })
        }
    },
    {
        name: 'finances',
        path: '/finances',
        component: AllFinances,
        beforeEnter: (to, from, next) =>{
            axios.get('/api/auth').then(()=>{
                next()
            }).catch(()=>{
                return next({ name: 'login'})
            })
        }
    },
    {
        name: 'finance-add',
        path: '/finances/add',
        component: AddFinance,
        beforeEnter: (to, from, next) =>{
            axios.get('/api/auth').then(()=>{
                next()
            }).catch(()=>{
                return next({ name: 'login'})
            })
        }
    },
    {
        name: 'finance-edit',
        path: '/finances/edit/:id',
        component: EditFinance,
        beforeEnter: (to, from, next) =>{
            axios.get('/api/auth').then(()=>{
                next()
            }).catch(()=>{
                return next({ name: 'login'})
            })
        }
    },
    {
        name: 'finance-view',
        path: '/finances/view/:id',
        component: ViewFinance,
        beforeEnter: (to, from, next) =>{
            axios.get('/api/auth').then(()=>{
                next()
            }).catch(()=>{
                return next({ name: 'login'})
            })
        }
    },
    {
        name: 'tasks',
        path: '/tasks',
        component: AllTasks,
        beforeEnter: (to, from, next) =>{
            axios.get('/api/auth').then(()=>{
                next()
            }).catch(()=>{
                return next({ name: 'login'})
            })
        }
    },
    {
        name: 'task-add',
        path: '/tasks/add',
        component: AddTask,
        beforeEnter: (to, from, next) =>{
            axios.get('/api/auth').then(()=>{
                next()
            }).catch(()=>{
                return next({ name: 'login'})
            })
        }
    },
    {
        name: 'task-edit',
        path: '/tasks/edit/:id',
        component: EditTask,
        beforeEnter: (to, from, next) =>{
            axios.get('/api/auth').then(()=>{
                next()
            }).catch(()=>{
                return next({ name: 'login'})
            })
        }
    },
    {
        name: 'leads',
        path: '/leads',
        component: AllLeads,
        beforeEnter: (to, from, next) =>{
            axios.get('/api/auth').then(()=>{
                next()
            }).catch(()=>{
                return next({ name: 'login'})
            })
        }
    },
    {
        name: 'lead-add',
        path: '/leads/add',
        component: AddLead,
        beforeEnter: (to, from, next) =>{
            axios.get('/api/auth').then(()=>{
                next()
            }).catch(()=>{
                return next({ name: 'login'})
            })
        }
    },
    {
        name: 'lead-edit',
        path: '/leads/edit/:id',
        component: EditLead,
        beforeEnter: (to, from, next) =>{
            axios.get('/api/auth').then(()=>{
                next()
            }).catch(()=>{
                return next({ name: 'login'})
            })
        }
    },
    {
        name: 'documents',
        path: '/documents',
        component: AllDocuments,
        beforeEnter: (to, from, next) =>{
            axios.get('/api/auth').then(()=>{
                next()
            }).catch(()=>{
                return next({ name: 'login'})
            })
        }
    },
    {
        name: 'document-add',
        path: '/documents/add',
        component: AddDocument,
        beforeEnter: (to, from, next) =>{
            axios.get('/api/auth').then(()=>{
                next()
            }).catch(()=>{
                return next({ name: 'login'})
            })
        }
    },
    {
        name: 'document-edit',
        path: '/documents/edit/:id',
        component: EditDocument,
        beforeEnter: (to, from, next) =>{
            axios.get('/api/auth').then(()=>{
                next()
            }).catch(()=>{
                return next({ name: 'login'})
            })
        }
    },
    {
        name: 'document-view',
        path: '/documents/view/:id',
        component: ViewDocument,
        beforeEnter: (to, from, next) =>{
            axios.get('/api/auth').then(()=>{
                next()
            }).catch(()=>{
                return next({ name: 'login'})
            })
        }
    }
];