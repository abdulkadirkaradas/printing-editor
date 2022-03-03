<template>
    <div class="editor-container">
        <canvas id="editor"></canvas>
    </div>
</template>

<script>;
export default {
    props: {
        printingDetail: {
            type: Object,
            default: null
        }
    },
    data() {
        return {
        }
    },
    mounted() {
        let properties = this.printingDetail;
        var canvas = document.getElementById("editor");
        var ctx = canvas.getContext("2d");

        ctx.canvas.width = properties.width;
        ctx.canvas.height = properties.height;

        ctx.fillStyle = properties.bgcolor;
        ctx.fillRect(0, 0, properties.width, properties.height);

    },
    methods: {
    },
    components: {
    }
}
</script>

<style lang="scss">
    .editor-container {
        width: 100%;
        height: 100%;
        justify-content: center;
        align-items: center;
        display: flex;

        & canvas {
            position: relative;
        }
    }
</style>
