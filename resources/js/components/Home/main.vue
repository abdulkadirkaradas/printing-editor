<template>
    <div class="content-app">
        <Menu @SelectedPage="selectedPage"></Menu>
        <Dashboard :selectedPage="selectedPageName"></Dashboard>
    </div>
</template>

<script>
import Menu from './menu.vue';
import Dashboard from './dashboard.vue'

export default {
    data() {
        return {
            selectedPageName: "Dashboard",
        }
    },
    methods: {
        selectedPage(page) {
            this.selectedPageName = page;
        }
    },
    components: {
        Menu, Dashboard,
    }
}
</script>

<style lang="scss">
    .content-app {
        display: flex;
    }
</style>
