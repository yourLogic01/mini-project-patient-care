# 📘 Patient Care API Documentation

REST API untuk manajemen data pasien dan kunjungan rawat jalan.

## 📍 Base URL

```
http://localhost:8000/api
```

---

## 🔹 Endpoints: Pasien

### 📄 GET /patients

Menampilkan daftar pasien (paginated)

**Request:**

```
GET /api/patients
```

**Response:**

-   200 OK

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "name": "Ahmad",
            "nik": "1234567890",
            "gender": "L",
            "birth_date": "2000-01-01",
            "phone": "081234567890",
            "address": "Jalan Mawar"
        }
    ]
}
```

---

### 📄 GET /patients?search={name or nik} with query

Menampilkan daftar pasien (paginated)

**Request:**

```
GET /api/patients?search=bagas
```

**Response:**

-   200 OK

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 2,
            "name": "bagas",
            "nik": "3213052812010002",
            "gender": "L",
            "birth_date": "2000-01-16T00:00:00.000000Z",
            "phone": "08996248476",
            "address": "jl kuningan",
            "created_at": "2025-07-16T11:30:53.000000Z",
            "updated_at": "2025-07-16T11:31:03.000000Z"
        }
    ]
}
```

---

### 📄 GET /patients/{id}

Melihat detail 1 pasien berdasarkan ID

**Request:**

```
GET /api/patients/1
```

**Response:**

-   200 OK
-   404 Not Found

---

### 📝 POST /patients

Membuat data pasien baru

**Request:**

```
POST /api/patients
Content-Type: application/json
```

**Body:**

```json
{
    "name": "Siti",
    "nik": "0987654321",
    "gender": "P",
    "birth_date": "1999-12-31",
    "phone": "081234567891",
    "address": "Jl. Kenanga"
}
```

**Response:**

-   201 Created
-   422 Unprocessable Entity

---

### 🛠 PUT /patients/{id}

Mengupdate data pasien berdasarkan ID

**Request:**

```
PUT /api/patients/1
Content-Type: application/json
```

**Body:** Sama seperti POST

**Response:**

-   200 OK
-   404 Not Found

---

### ❌ DELETE /patients/{id}

Menghapus pasien berdasarkan ID

**Request:**

```
DELETE /api/patients/1
```

**Response:**

-   200 OK
-   404 Not Found

---

## ✅ Validasi Request

Menggunakan Laravel Form Request:

-   `name`: required, max:100
-   `nik`: required, unique
-   `gender`: required, in:L,P
-   `birth_date`: required, date
-   `phone`: required
-   `address`: required

---

## 🔹 Endpoints: Kunjungan (Visits)

### ➕ POST /visits

Menambahkan data kunjungan baru untuk pasien.

**Request:**

```
POST /api/visits
Content-Type: application/json
```

**Body:**

```json
{
    "patient_id": 1,
    "visit_date": "2025-07-16",
    "departmen": "umum",
    "doctor_name": "dr. Andi",
    "complaint": "Demam Tinggi"
}
```

**Response:**

-   201 Created

```json
{
    "message": "Kunjungan berhasil ditambahkan",
    "data": {
        "patient_id": 1,
        "visit_date": "2025-07-16",
        "department": "umum",
        "doctor_name": "dr. Andi",
        "complaint": "Demam tinggi"
    }
}
```

**Validasi:**

-   `patient_id`: required, harus ada di tabel `patients`
-   `visit_date`: required, format tanggal
-   `department`: required, max 50 karakter
-   `doctor_name`: required, max 100 karakter
-   `complaint`: required

---

## 🔹 Endpoints: Riwayat Kunjungan (Histories)

### 📄 GET /histories

Menampilkan daftar kunjungan (termasuk data pasien).

**Request:**

```
GET /api/histories
```

**Response:**

-   200 OK

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "visit_date": "2025-07-16",
            "complaint": "Sakit kepala",
            "patient": {
                "id": 1,
                "name": "Ahmad"
            }
        }
    ]
}
```

---

### 📄 GET /histories/{id}

Melihat detail kunjungan berdasarkan ID (dengan data pasien).

**Request:**

```
GET /api/histories/1
```

**Response:**

-   200 OK

```json
{
    "id": 1,
    "visit_date": "2025-07-16",
    "department": "Poli Umum",
    "doctor_name": "dr. Andi",
    "complaint": "Demam tinggi",
    "patient": {
        "id": 1,
        "name": "Ahmad",
        "nik": "1234567890",
        "gender": "L",
        "phone": "081234567890",
        "address": "Jalan Mawar"
    }
}
```

---

### 📄 GET /histories/{id}/patient

Menampilkan semua riwayat kunjungan berdasarkan ID pasien.

**Request:**

```
GET /api/histories/1/patient
```

**Response:**

-   200 OK

```json
{
    "patient": {
        "id": 1,
        "name": "Ahmad",
        "nik": "1234567890"
    },
    "visits": [
        {
            "id": 1,
            "visit_date": "2025-07-16",
            "complaint": "Sakit kepala"
        }
    ]
}
```

# 📘 Patient Care API Documentation

REST API untuk manajemen data pasien dan kunjungan rawat jalan.

## 📍 Base URL

```
http://localhost:8000/api
```

---

## 🔹 Endpoints: Pasien

### 📄 GET /patients

Menampilkan daftar pasien (paginated)

**Request:**

```
GET /api/patients
```

**Response:**

-   200 OK

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "name": "Ahmad",
            "nik": "1234567890",
            "gender": "L",
            "birth_date": "2000-01-01",
            "phone": "081234567890",
            "address": "Jalan Mawar"
        }
    ]
}
```

---

### 📄 GET /patients/{id}

Melihat detail 1 pasien berdasarkan ID

**Request:**

```
GET /api/patients/1
```

**Response:**

-   200 OK
-   404 Not Found

---

### 📝 POST /patients

Membuat data pasien baru

**Request:**

```
POST /api/patients
Content-Type: application/json
```

**Body:**

```json
{
    "name": "Siti",
    "nik": "0987654321",
    "gender": "P",
    "birth_date": "1999-12-31",
    "phone": "081234567891",
    "address": "Jl. Kenanga"
}
```

**Response:**

-   201 Created
-   422 Unprocessable Entity

---

### 🛠 PUT /patients/{id}

Mengupdate data pasien berdasarkan ID

**Request:**

```
PUT /api/patients/1
Content-Type: application/json
```

**Body:** Sama seperti POST

**Response:**

-   200 OK
-   404 Not Found

---

### ❌ DELETE /patients/{id}

Menghapus pasien berdasarkan ID

**Request:**

```
DELETE /api/patients/1
```

**Response:**

-   200 OK
-   404 Not Found

---

## ✅ Validasi Request

Menggunakan Laravel Form Request:

-   `name`: required, max:100
-   `nik`: required, unique
-   `gender`: required, in:L,P
-   `birth_date`: required, date
-   `phone`: required
-   `address`: required

---

## 🔹 Endpoints: Kunjungan (Visits)

### ➕ POST /visits

Menambahkan data kunjungan baru untuk pasien.

**Request:**

```
POST /api/visits
Content-Type: application/json
```

**Body:**

```json
{
    "patient_id": 1,
    "visit_date": "2025-07-16",
    "departmen": "umum",
    "doctor_name": "dr. Andi",
    "complaint": "Demam Tinggi"
}
```

**Response:**

-   201 Created

```json
{
    "message": "Kunjungan berhasil ditambahkan",
    "data": {
        "patient_id": 1,
        "visit_date": "2025-07-16",
        "department": "umum",
        "doctor_name": "dr. Andi",
        "complaint": "Demam tinggi"
    }
}
```

**Validasi:**

-   `patient_id`: required, harus ada di tabel `patients`
-   `visit_date`: required, format tanggal
-   `department`: required, max 50 karakter
-   `doctor_name`: required, max 100 karakter
-   `complaint`: required

---

## 🔹 Endpoints: Riwayat Kunjungan (Histories)

### 📄 GET /histories

Menampilkan daftar kunjungan (termasuk data pasien).

**Request:**

```
GET /api/histories
```

**Response:**

-   200 OK

```json
{
			"id": 1,
			"patient_id": 1,
			"visit_date": "2025-07-16T00:00:00.000000Z",
			"department": "Anak",
			"doctor_name": "dr. Saber Parker",
			"complaint": "kurang tidur",
			"created_at": "2025-07-16T14:25:03.000000Z",
			"updated_at": "2025-07-16T14:25:03.000000Z",
			"patient": {
				"id": 1,
				"name": "letnan",
				"nik": "3213052812010000",
				"gender": "P",
				"birth_date": "2025-07-19T00:00:00.000000Z",
				"phone": "381775457350",
				"address": "jl kuningan",
				"created_at": "2025-07-16T14:08:40.000000Z",
				"updated_at": "2025-07-16T14:08:40.000000Z"
			}
},
```

---

### 📄 GET /histories/{id}

Melihat detail kunjungan berdasarkan ID (dengan data pasien).

**Request:**

```
GET /api/histories/1
```

\*note : $id is id for visits not id users

**Response:**

-   200 OK

```json
{
    "id": 1,
    "visit_date": "2025-07-16",
    "department": "Poli Umum",
    "doctor_name": "dr. Andi",
    "complaint": "Demam tinggi",
    "patient": {
        "id": 1,
        "name": "Ahmad",
        "nik": "1234567890",
        "gender": "L",
        "phone": "081234567890",
        "address": "Jalan Mawar"
    }
}
```

---

### 📄 GET /histories/{id}/patient

Menampilkan semua riwayat kunjungan berdasarkan ID pasien.

**Request:**

```
GET /api/histories/1/patient
```

\*note : {id} means for users id

**Response:**

-   200 OK

```json
{
    "patient": {
        "id": 3,
        "name": "asep",
        "nik": "3215201232021212"
    },
    "visits": [
        {
            "id": 7,
            "patient_id": 3,
            "visit_date": "2025-07-17T00:00:00.000000Z",
            "department": "Umum",
            "doctor_name": "dr. Jhon Doe",
            "complaint": "sakit kepala",
            "created_at": "2025-07-16T23:05:23.000000Z",
            "updated_at": "2025-07-16T23:05:23.000000Z"
        },
        {
            "id": 4,
            "patient_id": 3,
            "visit_date": "2025-07-24T00:00:00.000000Z",
            "department": "Gigi",
            "doctor_name": "dr. Alex Smith",
            "complaint": "gusi bengkak",
            "created_at": "2025-07-16T12:06:07.000000Z",
            "updated_at": "2025-07-16T12:06:07.000000Z"
        }
    ]
}
```
