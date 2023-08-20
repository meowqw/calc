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
          v-model="formData.phone"
          v-on:input="enterPhone"
          v-mask="'+7 (###) ###-##-##'"
        />
        <button
          type="button"
          class="btn-reset form__btn-clean"
          style="display: none"
          id="tel-btn"
        >
          <font-awesome-icon :icon="['fas', 'xmark']" />
        </button>
      </label>
      <!-- элемент для номера телефона, отображающий возможные номера-->
      <div class="form-tel" v-if="formData.phone.length < maxPhoneLength">
        <ul
          class="list-reset form-tel__list"
          v-for="(item, index) in this.phoneSelect"
          :key="index"
        >
          <li class="form-tel__item" @click="addPhoneNumber(item.phone)">
            {{ item.phone }}
          </li>
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
          v-model="formData.fullName"
        />
        <button
          type="button"
          class="btn-reset form__btn-clean"
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
          v-model="formData.email"
        />
        <button
          type="button"
          class="btn-reset form__btn-clean"
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
          v-model="formData.note"
        ></textarea>
        <button
          type="button"
          class="btn-reset form__btn-clean"
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
          v-model="formData.address"
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
          v-model="formData.date"
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
          v-model="formData.time"
        />
      </label>
      <button class="btn-reset btn form__btn" type="sumbit">
        Добавить клиента
      </button>
    </form>
  </div>
</template>

<script>
import axios from "axios";
import { mapActions } from "vuex";

export default {
  name: "calc-add-client",
  data() {
    return {
      formData: {
        fullName: "",
        phone: "",
        email: "",
        note: "",
        address: "",
        date: "",
        time: "",
      },
      phoneSelect: [],
      maxPhoneLength: 18,
    };
  },
  methods: {
    ...mapActions(["ADD_CLIENT", "SUBMIT_NEW_USER"]),

    async addClient(event) {
      event.preventDefault();

      await this.SUBMIT_NEW_USER(this.formData);

      this.clearForm();
    },

    clearForm() {
      this.formData.fullName = "";
      this.formData.phone = "";
      this.formData.email = "";
      this.formData.address = "";
      this.formData.date = "";
      this.formData.time = "";
      this.formData.note = "";
    },

    // ввод телефона и список телефонов
    enterPhone: async function () {
      if (this.formData.phone.length > 10 && this.formData.phone[0] == "8") {
        this.formData.phone = this.formData.phone.slice(1);
      }

      this.formData.id = null;
      if (this.formData.phone.length > 0) {
        let clients = await this.getData(
          `http://37.46.134.113:2041/api/v1/clients/phone/${this.formData.phone}`
        );
        this.phoneSelect = clients.data.data;

        if (this.formData.phone.length == 16 && clients.data.length >= 1) {
          this.phoneSelect = clients;
        }
      }
    },

    // get запрос
    getData: async function (url) {
      try {
        const response = await axios.get(url);
        return response;
      } catch (error) {
        console.error(error);
      }
    },

    // добавление номера телефона из списка в инпут
    addPhoneNumber(phone) {
      this.formData.phone = phone;
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

.form-tel {
  width: 100%;

  &__list {
    display: flex;
    flex-direction: column;
  }

  &__item {
    padding: 2px;
    font-size: 14px;
    color: $dark-color;
    cursor: pointer;
  }
}
</style>
