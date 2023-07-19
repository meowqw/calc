<template>
  <div class="table-estimate">
    <table class="table table-estimate__table">
      <caption>
        Смета
        <span>вся стоимсоть в рублях</span>
      </caption>
      <thead>
        <tr>
          <th scope="col" rowspan="2">№</th>
          <th scope="col" rowspan="2">Позиция</th>
          <th scope="col" colspan="2">Коронка</th>
          <th scope="col" colspan="2">Толщина стены</th>
          <th scope="col" colspan="2">Количество отверстий</th>
          <th scope="col" colspan="2">Материал стены</th>
          <th scope="col" colspan="2">Коэффициенты</th>
          <th scope="col" rowspan="2">Итоговая стоимость</th>
        </tr>
        <tr>
          <th>Диаметр</th>
          <th>Стоимость</th>
          <th>Толщина</th>
          <th>Стоимость</th>
          <th>Количество</th>
          <th>Стоимость</th>
          <th>Материал</th>
          <th>Стоимость</th>
          <th>Коэффициент</th>
          <th>Стоимость</th>
        </tr>
      </thead>
      <tbody>
        <!-- item -->
        <tr>
          <td data-label="№">1</td>
          <td data-label="Позиция">Стена 1</td>
          <!-- коронка -->
          <td data-label="Диаметр коронки">100 см</td>
          <td data-label="Стоимость коронки">100</td>
          <!-- толщина стены -->
          <td data-label="Толщина стены">10 см</td>
          <td data-label="Стоимость стены">1000</td>
          <!-- количество отверстий -->
          <td data-label="Количество отверстий">2</td>
          <td data-label="Стоиость отверстий">200</td>
          <!-- материал стены -->
          <td data-label="Материал стены">Бетон</td>
          <td data-label="Стоимость стены">5000</td>
          <!-- коэффициенты -->
          <td data-label="Коэффициенты">Глубина отверстия менее 20 см</td>
          <td data-label="Стоимость коэффициента">2000</td>
          <!-- итоговая стоимость -->
          <td data-label="Итоговая стоимость">5000</td>
        </tr>
        <!-- item -->
        <tr>
          <td data-label="№">1</td>
          <td data-label="Позиция">Стена 1</td>
          <!-- коронка -->
          <td data-label="Диаметр коронки">100 см</td>
          <td data-label="Стоимость коронки">100</td>
          <!-- толщина стены -->
          <td data-label="Толщина стены">10 см</td>
          <td data-label="Стоимость стены">1000</td>
          <!-- количество отверстий -->
          <td data-label="Количество отверстий">2</td>
          <td data-label="Стоиость отверстий">200</td>
          <!-- материал стены -->
          <td data-label="Материал стены">Бетон</td>
          <td data-label="Стоимость стены">5000</td>
          <!-- коэффициенты -->
          <td data-label="Коэффициенты">Глубина отверстия менее 20 см</td>
          <td data-label="Стоимость коэффициента">2000</td>
          <!-- итоговая стоимость -->
          <td data-label="Итоговая стоимость">5000</td>
        </tr>

        <!-- total -->
        <tr>
          <td colspan="12"></td>
          <td data-label="Общий итог">10000</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: "calc-table-estimate",
};
</script>

<style lang="scss" scoped>
.table-estimate {
  width: 100%;
}

table {
  table-layout: auto;
  margin: 0;
  border-collapse: collapse;
  padding: 0;
  width: 100%;

  caption {
    margin-bottom: 10px;
    font-size: 22px;

    span {
      font-size: 12px;
    }
  }

  tr {
    &:nth-child(even) {
    }
  }

  thead {
    tr {
    }
  }

  tbody tr td {
    padding: 5px;
    font-size: 14px;
    line-height: 120%;

    &:nth-child(2) {
      font-weight: 600;
    }
  }

  th,
  td {
    border: 1px solid $black-color;
    padding: 5px;
    text-align: left;
  }

  th {
    font-weight: 500;
    font-size: 14px;
    line-height: 120%;
  }

  @include mobile {
    tbody tr td {
      padding: 5px;
    }
  }
}
</style>
