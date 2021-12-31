<template>
    <div class="aside-menu">
        <div class="menu-item noselect" @click="getViews('Dashboard')">Dashboard</div>
        <div class="menu-item noselect" @click="getViews('UserActions')">User Actions</div>
        <div class="menu-item noselect" @click="getViews('Printing')">Printing</div>
        <div class="menu-item noselect" @click="getViews('Settings')">Settings</div>
    </div>
</template>

<script>
export default {
    methods: {
        getViews(viewName) {
            this.$emit("SelectedPage", viewName);
        }
    },
    components: {}
}
</script>

<style lang="scss">
    .aside-menu {
        min-width: 250px;
        min-height: 100%;
        background: #64b3f4;
        padding: 10px;
        position: absolute;
        left: 0;

        & .menu-item {
            width: auto;
            height: auto;
            text-align: center;
            cursor: pointer;
            border: 1px solid blue;
            margin-bottom: 50px;
            font: normal normal normal 18px/16px Josefin Sans;
            padding: 50px 0 50px 0;
        }
    }

    .noselect {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (max-width: 991px) {
        .aside-menu {
            display: none;
        }
    }
</style>
