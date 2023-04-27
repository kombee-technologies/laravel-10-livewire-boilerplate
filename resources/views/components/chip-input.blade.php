<div class="flex flex-wrap gap-2">
    <template x-for="(chip, index) in chips" :key="index">
        <div class="flex items-center px-2 py-1 bg-gray-100 rounded-full">
            <span x-text="chip"></span>
            <button type="button" class="flex-shrink-0 ml-2 text-gray-500 hover:text-gray-700" @click="removeChip(index)">
                <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 6.707a1 1 0 011.414 0L10 8.586l3.293-3.293a1 1 0 111.414 1.414L11.414 10l3.293 3.293a1 1 0 01-1.414 1.414L10 11.414l-3.293 3.293a1 1 0 01-1.414-1.414L8.586 10 5.293 6.707z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </template>

    <input type="text" class="w-full px-2 py-1 border border-gray-300 rounded-full focus:outline-none focus:ring focus:ring-blue-500" x-model="newChip" @keydown.enter.prevent="addChip">
</div>