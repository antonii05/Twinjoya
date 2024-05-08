//Importaciones


//Composable
export const useUtils = () => {
    //Variables


    //Funciones

    const formatearFecha = (fecha: string): String => {
        // Remover la parte de la zona horaria (Z) y los microsegundos (.000000)
        return fecha.replace('Z', '').replace('.000000', '');
    }

    return { formatearFecha }
}