<template>
    <div class="direct-chat-messages">

        <!-- Message. Default to the left -->
        <div class="direct-chat-msg" v-for="message in messages">
            <div class="direct-chat-info clearfix">
                <span class="direct-chat-name pull-left">{{message.user.name}}</span>
                <span class="direct-chat-timestamp pull-right">{{message.user.created_at}}</span>
            </div>
            <!-- /.direct-chat-info -->
            <img class="direct-chat-img" src="img/user1-128x128.jpg"
                 alt="Message User Image"><!-- /.direct-chat-img -->
            <div class="direct-chat-text">
                {{message.message}}
            </div>
            <!-- /.direct-chat-text -->
        </div>
        <!-- /.direct-chat-msg -->
    </div>
</template>

<script>
    export default {
        props: ['messages']
    }
</script>
