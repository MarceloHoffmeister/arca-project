<template>
    <div class="container">
        <slot></slot>
    </div>
</template>

<script>
export default {
    name: 'Container',
}
</script>

<style scoped>
    .container {
        width: 100%;
        max-width: 1120px;
        height: 100vh;
        margin: 0 auto;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .container .content {
        width: 100%;
        padding: 20px;
        background: #f0f0f5;
        box-shadow: 0 0 100px rgba(0, 0, 0, 0.1);
        border-radius: 8px;

        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-direction: column;
    }

    .container .content section {
        width: 100%;
        max-width: 900px;
        text-align: center;
    }

    .container .content section h1 {
        margin: 10px;
        font-size: 32px;
    }

    .container .content section p {
        font-size: 18px;
        color: #737380;
        line-height: 32px;
        margin: 10px 10px 20px 10px;
    }

    .container .content form {
        width: 100%;
        max-width: 450px;
        margin: 10px 10px 20px 10px;
    }

    .container .content form input, .container .content form textarea {
        margin-top: 8px;
    }

    .container .content form .input-group {
        display: flex;
    }

    .container .content form .input-group input + input {
        margin-left: 8px;
    }
</style>
