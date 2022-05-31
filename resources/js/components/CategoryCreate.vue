<template>
    <div class="container">
        <form @submit.prevent="saveCategory">
            <div class="form-group">
                <label>Name: </label>
                <input type="text" class="form-control" placeholder="category name" v-model="form.name">
            </div>
            <div class="form-group">
                <label>Code: </label>
                <input type="text" class="form-control" placeholder="category code" v-model="form.code">
            </div>
            <div class="form-group">
                <label>Icon: </label>
                <input type="text" class="form-control" placeholder="category icon" v-model="form.icon">
            </div>
            <div class="form-group"><br/>
                <button :disabled="!submittable" type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        {{errors}}
    </div>
</template>

<script lang='ts'>
import { reactive, computed } from 'vue';
import useCategory from "../composables/categories";

export default {
    name: 'CategoryCreate',
    setup() {
        const { errors, storeCategory } = useCategory();

        const form = reactive({
            name: '',
            code: '',
            icon: ''
        })

        const submittable = computed(() => {
            return form.name !== '' && form.code !== ''
                && form.icon !== '';
        });


        const saveCategory = async () => {
            await storeCategory({ ...form })
        }

        return {
            form,
            errors,
            saveCategory,
            submittable
        }
    }
}
</script>
