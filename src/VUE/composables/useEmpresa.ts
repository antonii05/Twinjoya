import { ref } from "vue";
import type { Empresa } from "@/VUE/models/Empresa";
import EmpresaApi from "@/VUE/api/EmpresaApi";

export function useEmpresa() {
    const empresas = ref([] as Empresa[]);

    const cargarEmpresas = async () => {
        try {
            empresas.value = await EmpresaApi.getEmpresas();
        } catch (error) {
            console.log('Error en la carga de empresas ERROR: ' + error);
        }
    }

    return { empresas,cargarEmpresas }
}