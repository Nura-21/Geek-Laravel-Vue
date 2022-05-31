<template>
    <div class="container d-flex flex-column">
        <div class="d-flex flex-row justify-content-between">
            <h1>All categories</h1>
            <router-link :to="{ name: 'categories.create' }" class="text-sm font-medium nav-link">
                <button type="button" class="btn btn-outline-primary btn-lg">Add category</button>
            </router-link>
        </div>
        <div class="container d-flex flex-wrap flex-row">
            <div class="card" style="width: 14rem; float: left; margin: 5px" v-for="each in categories" :key="each.id" v-if="isNotEmpty">
                <router-link :to="{ name: 'categories.show' , params: { id: each.id }}">
                    <div class="card-body">
                        <h5 class="card-title text-center">Code: {{ each.code }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted text-center">Name: {{ each.name }}</h6>
                        <h6 class="card-subtitle mb-2 text-muted text-center">Icon: {{ each.icon }}</h6>
                    </div>
                </router-link>
            </div>
            <div class="mx-auto" v-else>
                <h3 class="text-muted">No categories</h3>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import {computed, onMounted} from 'vue';
import useCategory from "../composables/categories";

export default {
    setup() {
        const {categories, getCategories} = useCategory()
        onMounted(() => getCategories())

        return {
            categories,
            isNotEmpty: computed(() => Boolean(Object.keys(categories.value).length))
        }
    }
};
</script>

<style scoped>
</style>
