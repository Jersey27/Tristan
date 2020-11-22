<template>
    <transition name="modal-fade" id="modal">
        <div class="modal-backdrop" @click.self="$emit('close')" role="dialog">
            <div class="vue-modal border rounded" ref="modal">
                <header class="modal-header">
                    <slot name="header">
                        <h2>
                        This is the default tile!
                        </h2>

                        <button type="button" class="btn-close btn-right" @click="$emit('close')" aria-label="Close modal">
                        x
                        </button>
                    </slot>
                </header>

                <section class="modal-body">
                    <slot name="body">
                        I'm the default body!
                    </slot>
                </section>
            </div>
        </div>
    </transition>
</template>
<script>

</script>
<style>
    
    .modal-backdrop {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;
    align-items: center;
    }

    .vue-modal {
    background: #FFFFFF;
    box-shadow: 2px 2px 20px 1px;
    overflow-x: auto;
    display: flex;
    flex-direction: column;
    width:auto;
    }

    .modal-header,
    .modal-footer {
    padding: 15px;
    display: flex;
    }

    .modal-header {
    border-bottom: 1px solid #eeeeee;
    color: #4AAE9B;
    justify-content: space-between;
    }

    .modal-body {
    position: relative;
    padding: 20px 10px;
    }

    .btn-close {
    border: none;
    font-size: 20px;
    padding: 20px;
    cursor: pointer;
    font-weight: bold;
    color: #4AAE9B;
    background: transparent;
    }

    .modal-fade-enter,
    .modal-fade-leave-active {
    opacity: 0;
    }

    .modal-fade-enter-active,
    .modal-fade-leave-active {
    transition: opacity .5s ease
    }
</style>