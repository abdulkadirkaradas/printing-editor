<template>
    <div class="dashnoard-container">
        <div class="card" :class="selectedPage != `Dashboard` ? `hide` : null">
            <div class="card-item noselect">1</div>
            <div class="card-item noselect">2</div>
            <div class="card-item noselect">3</div>
        </div>
        <div class="other-pages" :class="selectedPage == `Dashboard` ? `hide` : null">
            <div v-if="selectedPage == `UserActions`">
                <UserActions></UserActions>
            </div>
            <div v-else-if="selectedPage == `Printing`">
                <PrintingActions></PrintingActions>
            </div>
            <div v-else-if="selectedPage == `Settings`">
                <Settings></Settings>
            </div>
        </div>
    </div>
</template>

<script>
import UserActions from '../User/main.vue';
import PrintingActions from '../Printing/main.vue';
import Settings from '../Settings/main.vue';

export default {
    props: {
        selectedPage: {
            default: "Dashboard",
            type: String
        }
    },
    methods: {
        clg() {
            console.log(this.selectedPage);
        }
    },
    components: {
        UserActions, PrintingActions, Settings
    }
}
</script>

<style lang="scss">
    .dashnoard-container {
        width: 100%;
        border: 3px solid black;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;

        & .card {
            width: 100%;
            display: contents;

            & .card-item  {
                width: 100%;
                border: 3px solid black;
                padding: 10px;
                margin: 0 10px 0 10px;
                text-align: center;
            }
        }
    }

    .hide {
        display: none !important;
    }

    .noselect {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
</style>
