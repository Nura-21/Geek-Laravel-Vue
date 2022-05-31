<template>
    <div class="container">
        <form @submit.prevent="editCategory">
            <div class="form-group">
                <label>Name: </label>
                <input id="name" type="text" class="form-control" placeholder="category name" v-model="category.name">
            </div>
            <div class="form-group">
                <label>Code: </label>
                <input type="text" class="form-control" placeholder="category code" v-model="category.code" id="code">
            </div>
            <div class="form-group">
                <label>Icon: </label>
                <input type="text" class="form-control" placeholder="category icon" v-model="category.icon" id="icon">
            </div>
            <div class="form-group"><br/>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        {{errors}}
    </div>
</template>

<script lang='ts'>
import { onMounted } from 'vue';
import useCategory from "../composables/categories";

export default {
    props: {
        id: {
            required: true,
            type: String
        }
    },
    setup(props: any) {
        const { errors,  category, getCategory, updateCategory } = useCategory();
        onMounted(() => getCategory(props.id))
        const editCategory = async () => {
            await updateCategory(props.id);
        }
        return {
            category,
            errors,
            editCategory,
        }
    }
}
</script>
