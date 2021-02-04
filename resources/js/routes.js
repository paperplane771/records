import AllRecords from "./components/AllRecords";
import AddRecord from "./components/AddRecord";
import EditRecord from "./components/EditRecord";

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllRecords
    },
    {
        name: 'add',
        path: '/add',
        component: AddRecord
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditRecord
    }
];
