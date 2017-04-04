<template>
    <li class="list-group-item justify-content-between">
        {{ comment.body }}
        <button class="btn btn-danger" v-if="this.canDelete === true"
                @click="deleteComment(comment)">
            Delete!
        </button>
    </li>
</template>

<script>
    export default {
        props : ['comment', 'userid', 'candelete'],
        data() {
            return {
                canDelete: false
            }
        },
        methods: {
            deleteComment(comment) {
                this.$emit('commentdeleted', comment);
            }
        },
        created() {
            if (this.candelete || this.comment.user_id === Number(this.userid)) {
                this.canDelete = true;
                console.log('can Delete:', this.canDelete);
            }
        }
    }
</script>
