import numpy as np
import pandas as pd
from sklearn.feature_extraction.text import CountVectorizer
import pickle
import sys
import base64

# Đường dẫn tới tệp vector dữ liệu và mô hình
user_input = sys.argv[1]

data = pd.read_csv("D:\DatasetSpa (3).csv", encoding='utf-8')

data['tags'] = data['CauHoi'] + data['VanDe']

new_df = data[['idCoSo', 'CauHoi', 'DanhMuc', 'LoaiDichVu', 'VanDe', 'CauTraLoi', 'tags']]

# Biểu diễn vector cho dữ liệu vào
def is_string(value):
 return isinstance(value, str)

new_df['tags'] = new_df['tags'].apply(lambda x: str(x) if is_string(x) else '')   
cv = CountVectorizer()
vectors = cv.fit_transform(new_df['tags']).toarray()

def ketqua(trch):
    # Tiền xử lý du lieu nhập vào
    trch = trch.lower().strip().replace(",", "").replace(".", "")

    

    trch_vector = np.zeros(vectors.shape[1])
    unique_words = set(trch.split())

    for word in unique_words:
        if word in cv.vocabulary_:
            index = cv.vocabulary_[word]
            trch_vector[index] = 1

    # Tính toán sự tương đồng trong tập dữ liệu
    similarities = np.dot(vectors, trch_vector)

    # Xác định chỉ số gần nhất
    most_similar_index = np.argmax(similarities)

    if similarities[most_similar_index] == 0:
        nodt = "Xin lỗi, Tôi không thể xác định được."
        noData = base64.b64encode(nodt.encode('utf-8')).decode('utf-8')
        print(noData)
        return None

    # Trả về câu trả lời
    answer = new_df.iloc[most_similar_index]['CauTraLoi']
    return answer


KetQua = ketqua(user_input)

if KetQua is not None:
    CauTraLoi = KetQua

    repdata = " {}.".format(CauTraLoi)
    chdoan = base64.b64encode(repdata.encode('utf-8')).decode('utf-8')
    print(chdoan)

