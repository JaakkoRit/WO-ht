<template>
    <div>
        <ul class="list-group">
            <comment v-for="comment in comments" :comment="comment"
                     :userid="userid"
                     :candelete="candelete"
                     @commentdeleted="deleteComment(comment)"></comment>
        </ul>
        <div v-if="loading === true">Please wait while loading data...</div>
        <div v-if="comments.lenght === 0 && loading === false">There are no comments yet...</div>
    </div>
</template>,,

<script>
    import Comment from './Comment.vue'

    export default {
        props: {
            courseid: {
                type: String,
                required: true,
            },
            userid: {
                type: String,
                required: true
            },
            candelete: {
                type: Boolean,
                required: true
            }
        },
        components: {
            Comment,
        },
        methods: {
            deleteComment(comment) {
                axios.delete('/comments/' + comment.id)
                    .then(response => {
                        console.log(response);
                        this.getComments();
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            getComments() {
                axios.get('/comments/' + this.courseid)
                    .then(response => {
                        this.loading = false;
                        this.comments = response.data;
                    })
                    .catch(error => console.log(error));
            }
        },
        data() {
            return {
                comments: [],
                loading: true
            }
        },
        created() {
            console.log('Comment list created!', this.candelete);
            bus.$on('new-comment', ()=> {
                this.getComments();
            });
            this.getComments();
        },
    }
</script>
