<head>
    <link rel="stylesheet" href="/css/button_delete.css">
</head>
<button id="delete" class="del-btn" type="button" aria-label="Delete">
	<svg class="del-btn__icon" viewBox="0 0 48 48" width="48px" height="48px" aria-hidden="true">
		<clipPath id="can-clip">
			<rect class="del-btn__icon-can-fill" x="5" y="24" width="14" height="11" />
		</clipPath>
		<g fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" transform="translate(12,12)">
			<g class="del-btn__icon-lid">
				<polyline points="9,5 9,1 15,1 15,5" />
				<polyline points="4,5 20,5" />
			</g>
			<g class="del-btn__icon-can">
				<g stroke-width="0">
					<polyline id="can-fill" points="6,10 7,23 17,23 18,10" />
					<use clip-path="url(#can-clip)" href="#can-fill" fill="#fff" />
				</g>
				<polyline points="6,10 7,23 17,23 18,10" />
			</g>
		</g>
	</svg>
	<span class="del-btn__letters" aria-hidden="true" data-anim>
		<span class="del-btn__letter-box">
			<span class="del-btn__letter">D</span>
		</span>
		<span class="del-btn__letter-box">
			<span class="del-btn__letter">e</span>
		</span>
		<span class="del-btn__letter-box">
			<span class="del-btn__letter">l</span>
		</span>
		<span class="del-btn__letter-box">
			<span class="del-btn__letter">e</span>
		</span>
		<span class="del-btn__letter-box">
			<span class="del-btn__letter">t</span>
		</span>
		<span class="del-btn__letter-box">
			<span class="del-btn__letter">e</span>
		</span>
	</span>
</button>
<script type="text/javascript" src="/js/button_delete.js"></script>