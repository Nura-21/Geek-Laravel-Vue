<template>
    <div class="container">
        <h3>ID: {{id}}</h3>
        <div>
            <h2 class="title mb-2">Name: {{ category.name}}</h2>
            <h6 class="card-subtitle mb-2 text-muted">Code: {{ category.code}}</h6>
            <h6 class="card-subtitle mb-2 text-muted">Icon: {{ category.icon}}</h6>
        </div>

        <div>
            <router-link :to="{ name: 'categories.edit' , params: { id: `${category.id}` }}">
                <button class="btn btn-outline-primary btn-lg">Edit</button>
            </router-link>
            <button class="btn btn-outline-danger btn-lg" @click="deleteCategory(category)">Delete</button>
        </div>
    </div>
</template>

<script lang="ts">
import { onMounted } from 'vue';
import useCategory from "../composables/categories";

export default {
    name: 'CategoryShow',
    props: {
        id: {
            required: true,
            type: String
        }
    },

    setup(props) {
        const { category, getCategory, removeCategory } = useCategory()

        onMounted(() => getCategory(props.id))

        const deleteCategory = async ( category: any ) => {
            if (!window.confirm(`delete  ${category.name}?`)) {
                return
            }
            await removeCategory(props.id);
        };

        return {
            category,
            deleteCategory
        }
    }
};
</script>

<style scoped>
.btn-outline-danger{
    margin: 15px;
}
</style>


