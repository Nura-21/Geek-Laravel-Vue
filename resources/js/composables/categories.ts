import { ref } from 'vue'
import axios from "axios";
import { useRouter } from 'vue-router';

export default function useCategory() {
    const categories = ref([])
    const category = ref([])
    const categoriesLength = ref(0)
    const perPage = ref(0);

    const lastPage = ref(-1);

    const errors = ref('')

    const router = useRouter();

    const getCategories = async (currentPage: number = 1) => {
        const response = await axios.get(`/api/categories?page=${currentPage}`, );
        lastPage.value = response.data.last_page;
        categories.value = response.data.data;
        perPage.value = response.data.per_page;
        categoriesLength.value = response.data.total;
    }

    const getCategory = async (id: string) => {
        let response = await axios.get('/api/categories/' + id)
        category.value = response.data;
    }

    const storeCategory = async (data: object) => {
        errors.value = ''
        try {
            await axios.post('/api/categories', data)
            await router.push({name: 'categories.index'})
        } catch (e: any) {
            if (e.response.status === 422) {
                errors.value = e.response.errors
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
                errors.value = e.response.errors
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
        errors,
        categoriesLength,
        perPage,
    }
}
