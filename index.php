<html>
	<head>
		<title>Simple Vue.js shopping cart</title>
		<style>
			.container {
				width: 960px;
				margin: 0 auto;
			}
			
			.left {
				width: 60%;
				background: aliceblue;
				padding: 5%;
				float: left;
			}
			
			li {
				list-style: none;
			}
			
			ul {
				padding: 0;
				margin: 0;
			}
			
			li {
				width: 210px;
				padding: 10px 0;
			}
			
			button {
				float: right;
			}
			
			.right {
				float: right;
				background: aquamarine;
				width: 20%;
				padding: 5%;
			}			
		</style>
	</head>
	<body>
		
		<div id="app">
			<div class="container">
				<div class="left">
					<ul class="product">
						<li v-for="item in items" >
							{{ item.product }} &pound;{{ item.cost }} <button v-on:click="addToCart(item.id, item.product, item.cost)">Add to cart</button>
						</li>
					</ul>
				</div>
				<div class="right">
					<div class="cart">
						<ul>
							<li v-for="(cart, index) in carts" v-on:remove="carts.splice(index, 1)">
								{{ cart.product }} &pound;{{ cart.cost }} <button v-on:click="removeItem(index, carts)">Remove</button>
							</li>
						</ul>
						<span class="totals">Sub Total: &pound;{{ sum }}</span>
					</div>
				</div>
			</div>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://unpkg.com/vue/dist/vue.js"></script>

		<script>
			var app = new Vue({
				el: '#app',
				data: {
					carts: [],
					items: [
						{ id: 234, product: 'Foo', cost: 50 },
						{ id: 324, product: 'Bar', cost: 60 },
						{ id: 562, product: 'Cor', cost: 120 }
					],
					sum: 0
				},
				methods: {
					addToCart: function (id, product, cost) {
						var cartitem = { id: id, product: product, cost: cost }
						this.carts.push(cartitem);
						this.cartTotal(this.carts);
					},
					removeItem: function(index, carts) {
						app.carts.splice(index, 1);
						this.cartTotal(this.carts);
					},
					cartTotal: function(carts) {
						var subTotal = [];
						for(var i = 0, len = carts.length; i < len; i++) {
						    subTotal.push(carts[i]['cost']);  // Iterate over your first array and then grab the second element add the values up
						}
						function add(a, b) {
						    return a + b;
						}
						this.sum = subTotal.reduce(add, 0);
					}
					
				}
			});
		</script>
	</body>
</html>
