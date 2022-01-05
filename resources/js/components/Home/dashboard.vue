<template>
    <div class="dashboard-container">
        <div class="card">
            <div class="card-item noselect">1</div>
            <div class="card-item noselect">2</div>
            <div class="card-item noselect">3</div>
        </div>
    </div>
</template>

<script>

export default {
    methods: {
    },
    components: {}
}
</script>

<style lang="scss">
    .dashboard-container {
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
