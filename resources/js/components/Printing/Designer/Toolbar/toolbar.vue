<template>
    <div class="toolbar noselect-text">
        <div class="description"> Please drag items to editor screen</div>
        <div class="drag-list">
            <div v-for="item in draggableItems" :key="item.id" :class="item.class" :draggable="item.draggable">
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
            draggableItems: [
                {
                    id: 0,
                    title: "Name",
                    list: 1,
                    class: "data",
                    draggable: true,
                },
                {
                    id: 1,
                    title: "Surname",
                    list: 1,
                    class: "data",
                    draggable: true,
                },
                {
                    id: 2,
                    title: "Email",
                    list: 1,
                    class: "data",
                    draggable: true,
                },
                {
                    id: 3,
                    title: "Phone",
                    list: 1,
                    class: "data",
                    draggable: true,
                },
                {
                    id: 4,
                    title: "Address",
                    list: 1,
                    class: "data",
                    draggable: true,
                },
                {
                    id: 5,
                    title: "Image",
                    list: 1,
                    class: "data",
                    draggable: true,
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
        border: 1px solid black;
        padding: 10px;
        position: relative;

        & .description {
            text-align: center;
            margin-bottom: 10px;
            border: 1px solid black;
            border-style: dashed;
        }

        & .data {
            padding: 10px;
            border: 1px solid black;
            margin-bottom: 10px;
            cursor: pointer;
            text-align: center;
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
