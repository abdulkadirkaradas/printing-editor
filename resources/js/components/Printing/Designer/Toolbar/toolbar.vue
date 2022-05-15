<template>
    <div class="toolbar noselect-text">
        <div class="description"> Please click the button to add to the editor.</div>
        <div class="drag-list">
            <div v-for="item in items" :key="item.id" :class="item.class">
                {{ item.title }}
            </div>
        </div>
    </div>
</template>

<script>
import { Icon } from '@iconify/vue2';

export default {
    data() {
        return {
            items: [
                {
                    id: 0,
                    title: "Name",
                    class: "data",
                },
                {
                    id: 1,
                    title: "Surname",
                    class: "data",
                },
                {
                    id: 2,
                    title: "Email",
                    class: "data",
                },
                {
                    id: 3,
                    title: "Phone",
                    class: "data",
                },
                {
                    id: 4,
                    title: "Address",
                    class: "data",
                },
                {
                    id: 5,
                    title: "Image",
                    class: "data",
                },
            ],
        }
    },
    methods: {
    },
    mounted() {

    },
    components: {
       Icon
    }
}
</script>

<style lang="scss">
    .toolbar {
        height: 100%;
        border: 0.1vw solid black;
        padding: 0.7vw;
        position: relative;

        & .description {
            text-align: center;
            margin-bottom: 0.7vw;
            border: 0.1vw solid black;
            border-style: dashed;
            font-size: 1.2vw;
        }

        & .data {
            position: relative;
            padding: 0.7vw;
            margin-bottom: 0.7vw;
            border: 0.1vw solid black;
            cursor: pointer;
            text-align: center;
            font-size: 1.2vw;
        }
    }

    .noselect-text {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
</style>
