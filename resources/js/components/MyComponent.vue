<template>
  <div class="container">
    <p>{{ msg }}</p>
    <hr />
    <ul>
      <li v-for="(person, key) in people" :key="key">
        {{ person.id }}: {{ person.name }} [{{ person.mail }}]
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      msg: "wait...",
      name: "",
      people: [],
    };
  },
  methods: {
    doAction() {
      this.msg = `Hello ${this.name}!!`;
    },
  },
  mounted() {
    axios.get("/hello/json").then((response) => {
      this.people = response.data;
      this.msg = "got data.";
    });
  },
};
</script>
