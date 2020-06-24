<template>
    <div class="container">
        <Container>
            <div class="content">
                <section>
                    <h1>Cadastro</h1>
                    <p>Faça seu cadastro e ajude as pessoas a encontrarem casos que necessitam de assistência.</p>
                </section>
                <form>
                    <input type="text" placeholder="Nome da instituição" v-model="formData.name">
                    <input type="text" placeholder="Email" v-model="formData.email">
                    <input type="text" placeholder="Whatsapp" v-model="formData.whatsapp">
                    <div>
                        <input type="text" placeholder="Cidade" v-model="formData.city">
                        <input type="text" placeholder="UF" v-model="formData.uf">
                    </div>
                    <button class="button" type="submit" @click="saveFormData">Cadastrar</button>
                </form>
            </div>
        </Container>
    </div>
</template>

<script>
    import Container from '../components/Container'
    import client from '../Support/Http/axios'
    export default {
        name: 'Register',
        components: {
            Container,
        },
        data() {
            return {
                formData: {
                    name: '',
                    email: '',
                    whatsapp: '',
                    city: '',
                    uf: '',
                }
            }
        },
        methods: {
            saveFormData() {
                client.post('ocurrence/companies', this.formData)
                .then(({ data }) => {
                    if (data.code === 1) {

                        alert(`Seu ID de acesso: ${data.company_id}`);

                        this.$router.push('/');
                    }
                })
                .catch(() => {
                    this.errorMessage = 'Não foi possível salvar os dados';
                })
            }
        },
    }
</script>

<style scoped>

</style>
