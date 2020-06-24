<template>
    <Container>
        <div class="content">
            <section>
                <h1>Novo caso</h1>
                <p>Descreva o caso que necessita de assistência</p>

                <router-link class="back-link" :to="'/profile'">Voltar para a lista de casos</router-link>

            </section>
            <form>
                <input type="text" placeholder="Título" v-model="formData.title">
                <textarea type="text" placeholder="Descrição" v-model="formData.description"></textarea>
                <input type="text" placeholder="Valor" v-model="formData.value">
                <button class="button" type="submit" @click="saveFormData">Cadastrar</button>
                <div v-if="serverError" class="error">
                    <p>{{ errorMessage }}</p>
                </div>
            </form>
        </div>
    </Container>
</template>

<script>
    import Container from '../components/Container'
    import client from '../Support/Http/axios'
    export default {
        name: 'Incident',
        components: {
            Container,
        },
        data() {
            return {
                formData: {
                    company_id: localStorage.getItem('company_id'),
                    title: '',
                    description: '',
                    value: null,
                },
                serverError: false,
                errorMessage: '',
            }
        },
        methods: {
            saveFormData() {
                client.post('ocurrence/incidents', this.formData)
                .then(({ data }) => {
                    if (data.code === 1) {

                        this.$router.push('/profile');
                    }
                })
                .catch(() => {
                    this.serverError = true;
                    this.errorMessage = 'Não foi possível salvar os dados';
                    setTimeout(() => {
                        this.serverError = false;
                    }, 2000);
                })
            }
        }
    }
</script>

<style scoped>
    .error p {
        color: #e02041 !important;
        font-size: .865rem !important;
        font-weight: bold;
    }
</style>
