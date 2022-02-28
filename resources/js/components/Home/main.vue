<template>
    <div class="content-app">
        <Menu @SelectedPage="selectedPage"></Menu>
        <div class="other-pages">
            <UserActions></UserActions>
        </div>
        <!-- <div class="other-pages" :class="selectedPage == `Dashboard` ? `hide` : null">
            <div v-if="selectedPageName == `UserActions`">
                <UserActions></UserActions>
            </div>
            <div v-else-if="selectedPageName == `Printing`">
                <PrintingActions></PrintingActions>
            </div>
            <div v-else-if="selectedPageName == `Settings`">
                <Settings></Settings>
            </div>
            <div v-else-if="selectedPageName == `Dashboard`">
                <Dashboard></Dashboard>
            </div>
        </div> -->
    </div>
</template>

<script>
import Menu from './menu.vue';
import Dashboard from './dashboard.vue'
import UserActions from '../User/main.vue';
import PrintingActions from '../Printing/main.vue';
import Settings from '../Settings/main.vue';

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
        Menu, Dashboard, UserActions, PrintingActions, Settings
    }
}
</script>

<style lang="scss">
    html {
        background-color: #F4F6F9;
    }

    .other-pages {
        width: 100% !important;
    }

    .hide {
        display: none !important;
    }
</style>
