<template>
    <div class="container">
        <Container>
            <div class="content">
                <header>
                    <span>Bem vinda, {{ company_name }}</span>

                    <router-link class="button" to="/incident">Novo caso</router-link>
                </header>

                <h1>Casos cadastrados</h1>

                <ul>
                    <li v-for="incident in incidents" :key="incident.id">
                        <strong>CASO:</strong>
                        <p>{{ incident.title }}</p>

                        <strong>DESCRIÇÃO:</strong>
                        <p>{{ incident.description }}</p>

                        <strong>VALOR:</strong>
                        <p>{{ Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL'}).format(incident.value) }}</p>
                    </li>
                </ul>
            </div>
        </Container>
    </div>
</template>

<script>
    import Container from '../components/Container'
    import client from '../Support/Http/axios'
    export default {
        name: 'Profile',
        componentes: {
            Container
        },
        data() {
            return {
                company_id: localStorage.getItem('company_id'),
                company_name: localStorage.getItem('company_name'),
                incidents: [],
            }
        },
        methods: {
            async getIncidents() {
                let response = await client.get('ocurrence/incidents', {
                    params: {
                        company_id: this.company_id,
                    }
                });
                this.incidents = response.data;
            }
        },
        created() {
            this.getIncidents();
        }

    }
</script>

<style scoped>
    .container {
        width: 100%;
        max-width: 1180px;
        padding: 0 30px;
        margin: 32px auto;
    }

    .container header {
        display: flex;
        align-items: center;

    }

    .container header span {
        font-size: 20px;
    }

    .container header a {
        width: 260px;
        margin-left: auto;
        margin-top: 0;
    }

    .container header button {
        height: 60px;
        width: 60px;
        border-radius: 4px;
        border: 1px solid #dcdce6;
        background: transparent;
        margin-left: 16px;
        transition: border-color 0.2s;
    }

    .container header button:hover {
        border-color: #999;
    }

    .container h1 {
        margin-top: 80px;
        margin-bottom: 24px;
    }

    .container ul {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 24px;
        list-style: none;
    }

    .container ul li {
        background: #fff;
        padding: 24px;
        border-radius: 8px;
        position: relative;
    }

    .container ul li button {
        position: absolute;
        right: 24px;
        top: 24px;
        border: 0;
        background: transparent;
    }

    .container ul li button:hover {
        opacity: 0.8;
    }

    .container ul li strong {
        display: block;
        margin-bottom: 16px;
        color: #41414d;
    }

    .container ul li p + strong {
        margin-top: 32px;
    }

    .container ul li p {
        color: #737380;
        line-height: 21px;
        font-size: 16px;
    }
</style>
