<template>
  <v-toolbar>
    <!-- <v-toolbar-side-icon></v-toolbar-side-icon> -->
    <v-toolbar-title>CEOForum.ng</v-toolbar-title>
    <v-spacer></v-spacer>
    <app-notification v-if="loggedIn"></app-notification>
    <div class="hidden-sm-and-down">
       
       <router-link
        v-for="item in items"
        :key="item.title"
        :to="item.to"
        v-if="item.show">
        <v-btn flat>{{ item.title }}</v-btn>
      </router-link> 
      
    </div>
  </v-toolbar>
</template>

<script>
import AppNotification from './AppNotification'
export default {

    data(){
      return {
        loggedIn: User.loggedIn(),
        items: [
          {title : 'Forum', to: '/forum', show: true}, 
          {title : 'Ask Question', to: '/ask-question', show: User.loggedIn()},
          {title : 'Category', to: '/category', show: User.admin()},
          {title : 'Login', to: '/login', show: !User.loggedIn()}, 
          {title : 'Logout', to: '/logout', show: User.loggedIn()}
        ]
      }
    },

    components:{AppNotification},

    created(){
      EventBus.$on('logout', () =>{
        User.logout()
      })
    }

}
</script>

<style>

</style>
