export interface User {
    id: number;
    name: string;
    email: string;
    telefono: string | null;
    username: string;
    password: string;
    grupo: number | null;
    rol: string | null;
}
