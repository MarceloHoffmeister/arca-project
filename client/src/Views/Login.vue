<template>
    <div class="container">
        <Container>
            <div class="content">
                <section class="form">
                    <form @submit.prevent="handleLogin">
                        <h1>Faça seu logon</h1>

                        <input placeholder="Sua ID" v-model="company_id">
                        <button class="button" type="Submit">Entrar</button>
                        <div v-if="serverError" class="error">
                            <p>{{ errorMessage }}</p>
                        </div>
                        <router-link class="back-link" :to="'/register'">Não possui cadastro?</router-link>
                    </form>
                </section>
            </div>
        </Container>
    </div>
</template>

<script>
    import Container from '../components/Container'
    import client from '../Support/Http/axios'
    export default {
        name: 'Login',
        components: {
            Container,
        },
        data() {
            return {
                company_id: '',
                serverError: false,
                errorMessage: '',
            }
        },
        methods: {
            handleLogin() {
                client.get('ocurrence/companies', {
                    params: {
                        company_id: this.company_id,
                    }
                })
                .then(({ data }) => {
                    if (data !== null) {
                        localStorage.setItem('company_id', data[0].company_id);
                        localStorage.setItem('company_name', data[0].name);

                        this.$router.push('/profile');
                    }
                })
                .catch(() => {
                    this.serverError = true;
                    this.errorMessage = 'Não foi possível fazer login';
                    setTimeout(() => {
                        this.serverError = false;
                    }, 2000);
                })
            }
        }
    }
</script>

<style scoped>
    .container {
        max-width: 500px;
        margin: 0 auto;
    }
    form {
        margin: 0 auto !important;
    }

    .error p {
        color: #e02041 !important;
        font-size: .865rem !important;
        font-weight: bold;
    }
</style>
