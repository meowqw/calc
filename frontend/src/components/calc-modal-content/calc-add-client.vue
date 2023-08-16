<template>
  <div class="add-client">
    <form class="add-client__form form" @submit.prevent="addClient">
      <!-- номер телефона -->
      <label class="form__label label">
        <span>Номер телефона</span>
        <input
          type="tel"
          name="Номер телефона"
          class="input-reset input form__input"
          placeholder="Номер телефона"
          id="tel"
        />
        <button
          type="button"
          class="btn-reset form__btn-clean"
          onclick="document.getElementById('tel').value = ''"
          style="display: none"
          id="tel-btn"
        >
          <font-awesome-icon :icon="['fas', 'xmark']" />
        </button>
      </label>
      <!-- элемент для номера телефона, отображающий возможные номера-->
      <div class="form-tel">
        <ul class="list-reset form-tel__list">
          <li>+7(929)346-85-81</li>
        </ul>
      </div>
      <!-- фио клиента -->
      <label class="form__label label">
        <span>ФИО клиента</span>
        <input
          type="text"
          name="ФИО"
          class="input-reset input form__input"
          placeholder="Фамилия, Имя, Отчество"
          v-model="name"
        />
        <button
          type="button"
          class="btn-reset form__btn-clean"
          onclick="document.getElementById('name').value = ''"
          style="display: none"
          id="name-btn"
        >
          <font-awesome-icon :icon="['fas', 'xmark']" />
        </button>
      </label>
      <!-- Email клиента  -->
      <label class="form__label label">
        <span>Email клиента</span>
        <input
          type="email"
          name="Почта"
          class="input-reset input form__input"
          placeholder="Почта"
          id="mail"
        />
        <button
          type="button"
          class="btn-reset form__btn-clean"
          onclick="document.getElementById('mail').value = ''"
          style="display: none"
          id="mail-btn"
        >
          <font-awesome-icon :icon="['fas', 'xmark']" />
        </button>
      </label>
      <!-- заметка-->
      <label class="form__label label">
        <span>Заметка</span>
        <textarea
          class="form__textarea input textarea"
          name="notes"
          id="notes"
          placeholder="Подробности"
        ></textarea>
        <button
          type="button"
          class="btn-reset form__btn-clean"
          onclick="document.getElementById('notes').value = ''"
          style="display: none"
          id="notes-btn"
        >
          <font-awesome-icon :icon="['fas', 'xmark']" />
        </button>
      </label>
      <!-- дата -->
      <label class="form__label label">
        <span>Адрес</span>
        <input
          type="text"
          name="Адрес"
          class="input-reset input form__input"
          placeholder="Адрес"
          id="address"
        />
      </label>
      <!-- дата -->
      <label class="form__label label">
        <span>Дата</span>
        <input
          type="date"
          name="Дата"
          class="input-reset input form__input"
          placeholder="Дата"
          id="date"
        />
      </label>
      <!-- время -->
      <label class="form__label label">
        <span>Время</span>
        <input
          type="time"
          name="Время"
          class="input-reset input form__input"
          placeholder="Время"
          id="time"
        />
      </label>
      <button class="btn-reset btn form__btn" type="sumbit">
        Добавить клиента
      </button>
    </form>
  </div>
</template>

<script>
import { mapActions } from "vuex";

export default {
  name: "calc-add-client",
  data() {
    return {
      name: "",
    };
  },
  methods: {
    ...mapActions(["ADD_CLIENT"]),

    addClient() {
      const client = { name: this.name };
      this.ADD_CLIENT(client);
      this.clearForm();
    },

    clearForm() {
      this.name = "";
    },
  },
};
</script>

<style lang="scss" scoped>
.add-client {
  padding: 0 10px;
  width: 100%;

  @include mobile {
    // width: 290px;
  }

  &__form {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 15px;
  }
}

.form {
  &__label {
    width: 100%;
  }

  &__input {
    padding: 8px 12px;
  }
}
</style>
