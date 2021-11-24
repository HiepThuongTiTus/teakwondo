<div class="truck">
	<div class="truck__roof">
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div>

	<div class="menu">
		<section class="menu__section menu__section-burgers">
			<h2>Burgers</h2>
			<p><span>Hamburger</span>
				<span>$3</span>
			</p>
			<p><span>Cheeseburger</span>
				<span>$3.50</span>
			</p>
			<p><span>Double Cheese Burger</span>
				<span>$4.50</span>
			</p>
			<p><span>Veggie Burger</span>
				<span>$3</span>
			</p>
		</section>
		<section class="menu__section menu__section-dogs">
			<h2>Hot Dogs</h2>
			<p><span>Hot Dog</span> <span>$3</span></p>
			<p><span>Chilli Dog</span> <span>$5</span></p>
			<p><span>Veggie Hot Dog</span> <span>$3</span></p>
		</section>
		<section class="menu__section menu__section-sides">
			<h2>Sides</h2>
			<div class="menu__sides">
				<p><span>Chips</span> <span>$1</span></p>
				<p><span>Fries</span> <span>$2</span></p>
				<p><span>Sweet Potato Fries</span> <span>$3</span></p>
				<p><span>Onion Rings</span> <span>$3</span></p>
			</div>
		</section>
		<section class="menu__section menu__section-chili">
			<h2>Chili</h2>
			<p><span>Cup</span> <span>$2</span></p>
			<p><span>Bowl</span> <span>$4</span></p>
		</section>
		<section class="menu__section menu__section-drinks">
			<h2>Drinks</h2>
			<p><span>Soda</span> <span>$1</span></p>
			<p><span>Iced Tea</span> <span>$1</span></p>
			<p><span>Fresh Squeezed Lemonade</span> <span>$2</span></p>
		</section>
	</div>
</div> <!-- end truck -->
<style>
	* {
	box-sizing: border-box;
}

body {
	font-family: "Pangolin", cursive;
	font-size: 18px;
	margin: 1em 0;
}

h2 {
	text-transform: uppercase;
	font-size: 1.8rem;
	margin: 0;
	margin-bottom: 1rem;
	text-decoration-line: underline;
	text-decoration-style: wavy;
}

p {
	margin-bottom: 1rem;
}

.truck {
	width: 100%;
	max-width: 680px;
	margin: 0 auto;
	padding-bottom: 1em;
	background-color: #a7c6da;
}

.truck__roof {
	display: grid;
	grid-template-columns: repeat(11, 1fr);
}

.truck__roof div {
	height: 40px;
	border-radius: 0 0 50% 50%;
	background-color: #fb8b24;
}

.truck__roof div:nth-child(even) {
	background-color: #d90368;
}

.menu {
	position: relative;
	width: 95%;
	max-width: 600px;
	margin: 1em auto;
	display: grid;
	grid-gap: 1.4rem;
	background-color: #25283d;
	color: #fff;
	padding: 1em;
}

@media (min-width: 680px) {
	.menu {
		grid-template-columns: repeat(3, 1fr);
		grid-template-areas:
			"burgers dogs drinks"
			"chili sides sides";
	}
}

.menu__section p {
	display: flex;
	justify-content: space-between;
}

@media (min-width: 680px) {
	.menu__section-burgers {
		grid-area: burgers;
	}

	.menu__section-dogs {
		grid-area: dogs;
	}

	.menu__section-chili {
		grid-area: chili;
	}

	.menu__section-drinks {
		grid-area: drinks;
	}

	.menu__section-sides {
		grid-area: sides;
	}
}

.menu__sides {
	display: grid;
	grid-template-columns: 1fr 1fr;
	grid-column-gap: 1.4rem;
}

.menu__section-burgers h2,
.menu__section-burgers p > span:first-child {
	color: #fdafd4;
}

.menu__section-dogs h2,
.menu__section-dogs p > span:first-child {
	color: #a4e0a9;
}

.menu__section-chili h2,
.menu__section-chili p > span:first-child {
	color: #fcb573;
}

.menu__section-drinks h2,
.menu__section-drinks p > span:first-child {
	color: #b7d0e1;
}

.menu__section-sides h2,
.menu__section-sides p > span:first-child {
	color: #e4bdef;
}

</style>