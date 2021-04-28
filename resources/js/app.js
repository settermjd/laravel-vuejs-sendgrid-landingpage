require('./bootstrap');

const sendGridApp = {
    data() {
        return {
            errors: [],
            form: {
                email: '',
            },
            submitted: false
        }
    },
    methods: {
        processForm() {
            this.errors = []

            if (! this.form.email) {
               this.errors.push({
                   text: "Email cannot be empty"
               })
                return false;
            }

            this.subscribeUser()
        },
        async subscribeUser() {
            let URL = 'http://localhost:8000/signup'
            await fetch(
                URL,
                {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(this.form),
                })
                .then(resp => {
                    if (resp.ok) {
                        return resp.json()
                    } else {
                        throw Error(`Request rejected with status ${resp.status}`);
                    }
                })
                .then(data => {
                    // Hide the form and display the post-subscribe DOM element
                    this.submitted = data.status;

                    // Clear the email string submitted by the user
                    this.form.email = '';
                })
                .catch(err => console.log(err));
        }
    }
};

const app = Vue.createApp(sendGridApp)

app.component('error-item', {
    props: ['error'],
    template: `<li class="ml-4">{{ error.text }}</li>`
})

app.mount('#app')
