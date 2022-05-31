import { ref } from 'vue'
import axios from "axios";
import { useRouter } from 'vue-router';

export default function useCategory() {
    const categories = ref([])
    const category = ref([])

    const errors = ref('')

    const router = useRouter();

    const getCategories = async () => {
        const response = await axios.get('/api/categories');
        categories.value = response.data.data;
    }

    const getCategory = async (id: string) => {
        let response = await axios.get('/api/categories/' + id)
        category.value = response.data.data;
    }

    const storeCategory = async (data: object) => {
        errors.value = ''
        try {
            await axios.post('/api/categories', data)
            await router.push({name: 'categories.index'})
        } catch (e: any) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
            console.log(errors.value)
        }
    }

    const updateCategory = async (id: string) => {
        errors.value = ''
        try {
            await axios.put('/api/categories/' + id, category.value)
            await router.push({name: 'categories.index'})
        } catch (e: any) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const removeCategory = async (id: string) => {
        await axios.delete('/api/categories/' + id);
        await router.push({name: 'categories.index'});
    }

    return {
        categories,
        category,
        getCategories,
        getCategory,
        storeCategory,
        updateCategory,
        removeCategory,
        errors
    }
}
