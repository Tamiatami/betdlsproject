<div class="width-12 mb-2 inline-table">
	<div class="width-full inline-grid">
		<div class="panel-histories medium flex gap-1 p-2" id="unbox_history">
			<div class="history_message flex justify-center items-center width-full height-full">No unboxes</div>
		</div>
	</div>
</div>

<div class="flex justify-between pr-2 pl-2 font-9">
	<div id="unboxing_name"></div>
	<div class="flex">
		<div class="coins mr-1"></div>
		<div id="unboxing_price">0.00</div>
	</div>
</div>

<div class="unbox-case relative mt-2 transition-5" id="unbox_case">
	<div class="group-reel flex" id="unbox_spinner">
		<div class="flex" id="unbox_field"></div>
	</div>
	
	<div class="shadow shadow-left"></div>
	<div class="shadow shadow-right"></div>
	
	<div class="absolute top-0 bottom-0 left-0 right-0 flex justify-center">
		<div class="pointer flex items-center"></div>
	</div>
</div>

<div class="mt-2">
	<button class="site-button pink snow" id="unbox_test">SPIN FREE TEST</button>
	<button class="site-button purple snow" id="unbox_open">OPEN CASE</button>
</div>

<div class="mt-2 p-2">
	<div class="text-left font-9">This case contains:</div>

	<div class="unbox-list" id="unbox_list"></div>
</div>