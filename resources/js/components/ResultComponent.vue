<template>
<div>
<h1>Hello Result</h1>
<ul>
	<li 
      v-for="release_maker_name in release_maker_names" 
      v-text="release_maker_name"
    ></li>
	</ul>
</div>
</template>
<script>
export default {
		data(){
			return{
				release_maker_names:[],
			}
		},
		created(){
			axios.get('/result')
				.then(response => {
					this.release_maker_names = response.data.release_maker_name;
				})
				.catch(error => {
					console.log(error)
				});
		} 
}
</script>